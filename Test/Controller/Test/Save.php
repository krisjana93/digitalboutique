<?php
 
namespace DigitalBoutique\Test\Controller\Test;
 
use Magento\Framework\App\Action\Context;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use DigitalBoutique\Test\Model\TestFactory;
 
class Save extends \Magento\Framework\App\Action\Action
{
   protected $_pageFactory;
   protected $productRepository;
   protected $_test;
 
    public function __construct(
       \Magento\Framework\App\Action\Context $context,
       \Magento\Framework\View\Result\PageFactory $pageFactory,
       ProductRepositoryInterface $productRepository,
       TestFactory $test
       )
    {
       $this->_pageFactory = $pageFactory;
       $this->productRepository = $productRepository;
       $this->_test = $test;
    
       return parent::__construct($context);
    }


    public function execute()
    {
       $post = (array) $this->getRequest()->getPost();
       $data = $this->getRequest()->getParams();
    	 
       if(!empty($post)){
        $sku = $post['product_sku'];
           try {
            $productUrl = $this->productRepository->get($sku)->getProductUrl();
            //Redirect into product page
            $this->_response->setRedirect($productUrl);
           } catch (NoSuchEntityException $noSuchEntityException) {
               $productUrl = null;
               $this->messageManager->addErrorMessage('Product SKU not found.');
                //Redirect into same page
               return $this->resultRedirectFactory->create()->setPath('digital-boutique/test', ['_current' => true]);
           }

           // Save / Log enteries into custom db table
           $test = $this->_test->create();
           $test->setData($data);
           $test->save();
            
       } else {
           $this->messageManager->addErrorMessage('Request has not been sent.');
           return $this->resultRedirectFactory->create()->setPath('digital-boutique/test', ['_current' => true]);
       }
 
       return $this->_pageFactory->create();
    }
}
 
?>

