#!groovy

pipeline {
    agent {
        docker {
            image 'herloct/php-cs-fixer'
            args "--entrypoint='' --user \$(id-u):\$(id -g)"
            reuseNode true
        }
    }
//    agent none
    // environment {
    //     PATH = "$PATH:/usr/sbin:/sbin"
    // }
    stages {
        stage( 'SCM' ) {
            steps {
                echo "SCM checkout complete."
            }
        }
        stage( 'Test Docker Image' ) {
            // agent {
            //     docker 'herloct/php-cs-fixer'
            //     // docker {
            //     //     image 'herloct/php-cs-fixer'
            //     //     args '--user "$(id -u)":"$(id -g)"'
            //     // }
            // }
            steps {
                // sh 'php-cs-fixer ./htdocs/index.html --dry-run'
                echo "Testing image herloct/php-cs-fixer"
                sh 'ls'
            }
        }
    }
}
