#!groovy

pipeline {
    agent any
    // environment {
    //     PATH = "$PATH:/usr/sbin:/sbin"
    // }
    stages {
        stage( 'SCM' ) {
            steps {
                sh 'env'
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
            agent {
                docker {
                    image 'herloct/php-cs-fixer'
                    args '--entrypoint="" --volume=/Users/shaned/code/helloworld:/project'
                    reuseNode true
                }
            }
            steps {
                // sh 'php-cs-fixer ./htdocs/index.html --dry-run'
                echo "Testing image herloct/php-cs-fixer"
                sh 'ls -la'
                sh 'pwd'
                sh 'ls -la /'
                sh 'ls -la /project'
            }
        }
    }
}
