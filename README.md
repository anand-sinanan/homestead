# homestead
Laravel is growing on me! (even though my beginnings were in Symfony 1.3+)

Built using Homestead (Vagrant + Virtual Box) which could potentially take up a lot of time 
to config but it's worth it :)

If you have a similar VM set up then once you clone the project you place it in the code folder
of the HOST machine that is synced to the homestead environment.

In the environment you have set up, just run 'composer install' to get all required vendors and
make changes to the '.env' file where necessary (e.g. DB info). (I'll admit being new to the 
Homestead thing, I kept a copy of the DB because for whatever reasons/issues sometimes the DB
doesn't persist) 

'php artisan migrate' or use the db.sql to get started and register a new user to play around
'php artisan serve' to load up the app (Homesteaders make sure environment is --provision to see
in local browser)


From this point on, some personal notes on snags hit while setting up homestead on win10 :

Enabled Vt-X in BIOS

Virtual Box install went fine.

Vagrant issue directly after installing latest version (ruby issues fixed using) :
vagrant plugin install vagrant-share --plugin-version 1.1.8
(do this every time Virtual Box is updated)

vagrant up in Homstead folder failed. StackOverflow mentioned Avast has an
"Enable hardware-assisted virtualization" option that should be unchecked
Also had to configure the VirtualBox itself to actually use Vtx (which I
thought somehow Vagrantfile took care of)

For Windows had to configure system32/drivers/etc/hosts file to recognise homestead.app
Don't forget to use vagrant -provision to see it in browser

Although be careful sometimes it wipes DB (maybe I'm doing something wrong), get in practice of doing mysqldump in code folder so it syncs,
if DB disappears then restore from that file (only when using dev using local environment db vs. host environment)
