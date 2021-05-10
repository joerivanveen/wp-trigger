# wp-trigger
Simple plugin for developers to easily trigger hooks with arguments for testing / checking purposes.

Place trigger.php in your plugin directory and activate it in your wordpress->plugins dashboard.

Now you can trigger hooks using a query string, for instance:
http://localhost/your_path/?hook=the_hook&argument1=value1&argument2=value2

The name of the hook you want to trigger must be the first query var, and all the arguments this hook expects must follow in the right order.

This file also switches error reporting on.

Because I use the splat operator you need php5.6 or higher.

NOTE: only use it for development purposes, NEVER on a production server.
