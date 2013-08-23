x_breakpoint
============

Breakpoint for Agile Toolkit

This plugin will let you see backtrace of your application.

##Usage

* Create table 'breakpoint' in your database

* Add in Frontend.php 
    
        $this->add('x_breakpoint/Controller_Breakpoint');

* And put this line in place where you want to check backtrace

        $this->api->breakpoint->addBreakpoint('name_of_breakpoint');
You can set multiple breakpoints per one run.

* Refresh page


P.S. Don't forget to clean database after long usage :)