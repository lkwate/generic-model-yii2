# generic-model-yii2

## abstract
In application designed to management resource we commonly have some identified entities on which we want to perform some operations as CRUD. I observed that the common issue to solve this problem is to write scpecific code for each entity, imagine that in your application you we have more than 20 entities, your code source is going to be a big bang of file. To solve this problem I wrote code in php based on yii2 framework to handle generically some entities in your app and reduce drastically code line regardless of the size of managed entities. 
I will notice that the code source is not really important but the concept that i want to show

## installation step
follow this step to enjoy: 
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
The genericmodel you have installed require some configurations to work well. 
* execute the script in file /root_project/modules/genericmodel/scripts/Create.dll on your database
* After execute the previous script in your database, go to the link **http://localhost:8080/index.php?r=genericmodel%2Fgeneric-model%2Fwelcome ** there will be a tree menu generated from table **rubrique** of your database
now is a step to join enjoy the power of genericity without generate any code line. 
...
## 