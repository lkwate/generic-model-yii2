# generic-model-yii2

## abstract
Working on application designed to the management the resources we commonly have some entities on which we want to perform some operations like CRUD. We often write a specific code for each entity, this will be critical and difficult to maintain for large-scale Applications. To solve this problem we extend Yii2 framework based on Php by automatically generated Graphical User Interface needed for CRUD (Create Read Update Delete) Operation. This drastically reduce the size of code and speed up the tracking and the fixing of bugs.
## installation step
* install php, yii2 (with gii module) on your computer
* git clone https://github.com/lkwate/generic-model-yii2.git
* create folder name **modules** in the root directory of your app
* move generic-model in **modules** folder : mv /generic-model/genericmodel /path_of_target_directory
* cd /root_directory_project
* add this line in root/config/web.php to tell yii2 that you add module
    **'modules' => [
       'genericmodel' => [
           'class' => 'app\modules\genericmodel\GenericModel'
       ]
   ],**
After these step you can access to the home page of module with this link 
**http://localhost:8080/index.php?r=genericmodel%2Fgeneric-model%2Fwelcome **

## use case
The genericmodel you have installed requires some configurations to work well. 
* execute the script in file /root_project/modules/genericmodel/scripts/Create.dll on your database
* After execute the previous script in your database, go to the link **http://localhost:8080/index.php?r=genericmodel%2Fgeneric-model%2Fwelcome ** there will be a tree menu generated from table **rubrique** of your database
At this step we can operate on the tables of Databases without writing any code line.
...
## 
