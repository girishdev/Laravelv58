To Update Ubuntu Packages:
    sudo apt-get update (Refresh available updates)

    sudo apt-get upgrade (Upgrade all packages)

    sudo apt-get dist-upgrade (Upgrade with package replacements; upgrade Ubuntu version)

To Remove Some Packages:
    sudo apt remove --purge mysql-server
    sudo apt purge mysql-server
    sudo apt autoremove
    sudo apt autoclean
    sudo apt remove dbconfig-mysql

===========================
Problem:
    E: Could not get lock /var/lib/apt/lists/lock. It is held by process 1560 (packagekitd)
    N: Be aware that removing the lock file is not a solution and may break your system.
    E: Unable to lock directory /var/lib/apt/lists/

    Answer:
        This should be used as last resort. If you use this carelessly you can end up with a broken system. Please try the other answers first before doing this.
        You can delete the lock file with the following command:

        sudo rm /var/lib/apt/lists/lock
        You may also need to delete the lock file in the cache directory

        sudo rm /var/cache/apt/archives/lock
        sudo rm /var/lib/dpkg/lock
        After that, try opening Synaptic again.

        


