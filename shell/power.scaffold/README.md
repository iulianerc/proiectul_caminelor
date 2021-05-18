# Power.Scaffold
Welcome to PowerIT api scaffolding documentation.
To use this tool change your current directory to `power.scaffold/`

## Creating config files
To create a config file simply run
`./config.sh {YOUR_MODULE_NAME}`

Then you will find the `.conf` file in the `modules` directory.
In this file you can declare some module configuration.

### Config files syntax
Config files are using directive declaration style.
Available directives:
 - `@FIELDS` - Use it to declare catalog fields list
```
@FIELDS
id:int
name:string
@ENDFIELDS
```
 - `@VALIDATOIN` - In this section you can specify some validation rules
```
@VALIDATION
id:required|integer
name:required|string
@ENDVALIDATION
```

When your `.conf` file is ready you can run scaffolding command

## Catalog scaffolding
To scaffold base catalog structure you have to create config file and run

`scaffolding/api/catalog.sh {YOUR_MODULE} {YOUR_MODULE_PLURAL}`

### Scaffolding internal configuration
You can modify scaffolding elements. Base config is located in the `env.sh` file.

## Single element scaffolding
You may want to create just one element of catalog. Then you have to run

`scaffolding/api/{ELEMENT}.sh {YOUR_MODULE} {YOUR_MODULE_PLURAL} {DISTENATION_FOLDER} {FILEDS_LIST}`
