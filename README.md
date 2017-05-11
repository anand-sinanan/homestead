## Homestead + Laravel example ##

Built using [Homestead 5.4](https://laravel.com/docs/5.4/homestead) and following some of the [Laracasts](https://laracasts.com/series/laravel-from-scratch-2017).


### Pitfalls during Homestead setup ###
Just some personal notes I made:

*Enabled Vt-X in BIOS
*Virtual Box install went fine.
*Vagrant issue directly after installing latest version (ruby issues fixed using) :
vagrant plugin install vagrant-share --plugin-version 1.1.8
(do this every time Virtual Box is updated)
*vagrant up in Homstead folder failed. Avast has an "Enable hardware-assisted virtualization" 
option that should be unchecked (or any other software you might have running)
*Also had to configure the VirtualBox itself to actually use Vtx (which I
thought somehow Vagrantfile took care of)
*For Windows had to configure system32/drivers/etc/hosts file to recognise homestead.app
*Don't forget to use vagrant -provision to see it in browser
(Although be careful sometimes it wipes DB (maybe I'm doing something wrong), get in practice of doing mysqldump in code folder so it syncs,if DB disappears then restore from that file (only when using dev using local environment db vs. host environment)



### Installation ###

* `git clone https://github.com/anand-sinanan/homestead.git Code`
* `cd Code`
* `composer install`
* `php artisan migrate` (or use the db.sql to get started and register a new user to play around)
* `php artisian serve`

(Remember Homesteaders you mightn't even need to do this. Regardless, make sure it's being done in the right environment.)

If you have a similar VM set up then once you clone the project you place it in the code folder
of the HOST machine that is synced to the homestead environment.

