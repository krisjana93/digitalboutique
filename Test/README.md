Note: Module Tested into Magento version 2.3.4

Steps to install and test
1. Download repository 
2. Rename main folder as DigitalBoutique (this is my vendor name)
3. Put main folder into app/code so that the structure has to be like above:
            app/code/DigitalBoutique/Test



4. Run above commands:
- php bin/magento setup:upgrade
- php bin/magento setup:di:compile

DB 
- Custom table name is : digitalboutique_prodsku
