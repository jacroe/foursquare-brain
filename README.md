Foursquare Brain
================

Foursquare Brain is an attempt to chronicle every meal eaten at restaurants and other food places. Why? So you'll know what was good and what should never be eaten again.

It was born from a brain crack [tweet](https://twitter.com/jacroe/status/505415833083207680) and a [gist](https://gist.github.com/jacroe/522b9f0287ff95016d10).

It was written in ~8 hours on a Sunday so it's probably riddled with bugs. As far as I can tell, it *is* usuable.

Installation
============

```
git clone git@github.com:jacroe/foursquare-brain
cd foursquare-brain
composer install
```

You'll need to edit your configuration in `scalene/config.php`. Also `cron.php` will need its URL updated.