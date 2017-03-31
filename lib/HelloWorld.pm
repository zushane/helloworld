use strict;
use warnings;
package HelloWorld;

$HelloWorld::VERSION = '0.1';

sub hello {
   return "Hello, world!";
}

sub bye {
   return "Goodbye, cruel world!";
}

sub what {
    return "What even IS this world?";
}

sub repeat {
   return 1;
}

sub argumentTest {
    my ($booleanArg) = @_;

    if (!defined($booleanArg)) {
        return "null";
    }
    elsif ($booleanArg eq "false") {
        return "false";
    }
    elsif ($booleanArg eq "true") {
        return "true";
    }
    else {
        return "unknown";
    }

   return "Unreachable code: cannot be covered";
}

1;