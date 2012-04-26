GoCart on OpenShift
======================
GoCart is a CodeIgniter based Shopping Cart. The goal of GoCart is not to add an enormous number of features, but to build an easy to use, easy to customize shopping cart. We have packed in a nice feature set and plan on refining and adding more.
Refer http://gocartdv.com/features for more details.

This git repository helps you get up and running quickly a GoCart installation
on OpenShift.  The backend database is MySQL and the database name is the 
same as your application name (using $_ENV['OPENSHIFT_APP_NAME']).  You can name
your application whatever you want.  However, the name of the database will always
match the application so you might have to update .openshift/action_hooks/build.


Running on OpenShift
----------------------------

Create an account at http://openshift.redhat.com/

Create a php-5.3 application (you can call your application whatever you want)

    rhc app create -a GoCart -t php-5.3

Add MySQL support to your application

    rhc app cartridge add -a GoCart -c mysql-5.1

Add this upstream GoCart repo

    cd GoCart 
    git remote add upstream -m master git://github.com/IndianECommerceDevelopers/GoCart-example.git
    git pull -s recursive -X theirs upstream master
    # note that the git pull above can be used later to pull updates to GoCart
    
Then push the repo upstream

    git push

That's it, you can now checkout your application at (default admin account is admin/OpenShiftAdmin):

    http://GoCart-$yournamespace.rhcloud.com


NOTES:

GIT_ROOT/.openshift/action_hooks/deploy:
    This script is executed with every 'git push'.  Feel free to modify this script
    to learn how to use it to your advantage.  By default, this script will create
    the database tables that this example uses.

    If you need to modify the schema, you could create a file 
    GIT_ROOT/.openshift/action_hooks/alter.sql and then use
    GIT_ROOT/.openshift/action_hooks/deploy to execute that script (make sure to
    back up your application + database w/ 'rhc app snapshot save' first :) )

GoCart Security:
    If you're doing more than just 'playing' be sure to edit encryption_key in the php/gocart/config/config.php and modify
    You can refer to CodeIgniter Site for Encryption Key
    
	
My Additional Features on GoCart
================================
I am maintaining another Forked Repository (https://github.com/IndianECommerceDevelopers/GoCart) where I have implemented certain additional features like 1)  Social Login(customer can login using Facebook, Google or Yahoo Account).  2) Reply_to Address 3) Custom Product Size 4)  Save Shipping/Billing Address,etc,.
You can check my repository(https://github.com/IndianECommerceDevelopers/GoCart) if you are interested in any of these features


Credits
=======
All the credits goes to GoCart, CodeIgniter and OpenShift Team.