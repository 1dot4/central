#!/usr/bin/python

import os
import getpass

def setup():
    # Take all the configuration inputs for database
    dbHost = raw_input("Enter database host(usually localhost): ")
    dbUsername = raw_input("Enter database username(usually root): ")
    dbPassword = getpass.getpass("Enter database password: ")

    dbSetup = raw_input("Import database schema now? (y/n): ")

    # If import database flag set

    if(dbSetup == 'y'):
        print("Checking mysql connection...")
        # Import schema
        if(os.system("mysql -h "+dbHost+" -u "+dbUsername+" -p"+dbPassword+" < db/schema.sql")):
            print("Error: Wrong username/password/host. Please check again...Aborted")
            exit()
        else:
            print("User authenticated. Connected to mysql server...")
            print("Database at db/schema.sql imported successfully...")

    # Enter admin credentials
    adminUsername = raw_input("Enter new admin username: ")
    adminPassword = getpass.getpass("Enter new admin password: ")

    print("Configuring project...")

    # Generate configuration
    output = "<?php\n"
    output += "define('ADMIN_USER_NAME', '" + adminUsername + "');\n"
    output += "define('ADMIN_PASSWORD', '" + adminPassword + "');\n"
    output += "define('DB_HOST', '" + dbHost + "');\n"
    output += "define('DB_USER_NAME', '" + dbUsername + "');\n"
    output += "define('DB_PASSWORD', '" + dbPassword +"');\n"
    output += "define('DB_DATABASE', 'central');\n"

    # Write to configuration file
    f = open("var/config.php","wb")
    f.write(output)
    f.close()

    print("Configuring project...DONE")
    print("Configuration has been written to var/config.php. Edit that file for any mistakes or run configure.py again.")

def main():
    setup()

if __name__ == "__main__":
    main()
