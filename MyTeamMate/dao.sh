php app/console generate:bundle --namespace=Acme/MtmBundle;

php app/console doctrine:mapping:convert annotation ./src/Acme/MtmBundle/Resources/config/doctrine/metadata/orm --from-database --force;

php app/console doctrine:mapping:import AcmeMtmBundle annotation;

php app/console doctrine:generate:entities AcmeMtmBundle;
