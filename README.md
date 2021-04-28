<h1 align="center">Yii 2 Backoffice Template</h1>

The template includes three tiers: back end, and console, with webpack support, for use scss, react, and more. 

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    webpack/             contains js and scss files
vendor/                  contains php dependent 3rd-party packages
node_modules/            contains webpack dependent 3rd-party packages
environments/            contains environment-based overrides
```

For use webpack in dev mode you can use: 
```bash
$ npm run dev
```

For bundle your app to production mode run: 
```bash
$ npm run prod
```