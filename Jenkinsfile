#!groovy

pipeline {
    agent none
    // environment {
    //     PATH = "$PATH:/usr/sbin:/sbin"
    // }
    stages {
        stage( 'SCM' ) {
            steps {
                echo "SCM checkout complete."
            }
        }
        stage( 'Fix PHP code style.' ) {
            agent {
                docker {
                    image 'herloct/php-cs-fixer'
                    args "--user "$(id -u)":"$(id -g)" --volume ${PWD}:/project"
                }
            }
            steps {
                // sh 'php-cs-fixer ./htdocs/index.html --dry-run'
                echo "$PATH"
            }
        }
    }
}
