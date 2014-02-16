#!/usr/bin/python

import os
import getpass

def main():
    # Take all the configuration inputs from user
    dbHost = raw_input("Enter database host(usually localhost): ")
    dbUsername = raw_input("Enter database username(usually root): ")
    dbPassword = getpass.getpass("Enter database password(I don't know :D): ")
    adminUsername = raw_input("Enter new admin username:")
    adminPassword = getpass.getpass("Enter new admin password:")

    print("Configuring project...")

    # Generate configuration
    output = "<?php\n"
    output += "define('ADMIN_USER_NAME','" + adminUsername + "');\n"
    output += "define('ADMIN_PASSWORD', '" + adminPassword + "');\n"
    output += "define('DB_HOST','" + dbHost + "');\n"
    output += "define('DB_USER_NAME','" + dbUsername + "');\n"
    output += "define('DB_PASSWORD','" + dbPassword +"');\n"
    output += "define('DB_DATABASE','central');\n"

    # Write to configuration file
    f = open("var/config.php","wb")
    f.write(output)
    f.close()

    print("Configuring project...DONE")
    print("Configuration has been written to var/congif.php. Edit that file for any mistakes or run configure.py again.")


if __name__ == "__main__":
    main()
