#!groovy

/***
 * Jenkinsfile for perl HelloWorld project. 
 */

pipeline {
    agent any

    stages {
        stage('Build') {
            steps {
                echo 'Building..'
            }
        }
        stage('Test') {
            steps {
                echo 'Testing..'
            }
        }
        stage('Deploy') {
            steps {
                echo 'Deploying....'
            }
        }
    }
}

/*
pipeline {
	agent any

	stages {
		stage( 'Build' ) {
			steps {
				echo 'Building perl HelloWorld...'
				sh /usr/bin/perl Build.PL
			}
		}
		stage( 'Test' ) {
			steps {
				echo 'Testing perl HelloWorld...'
				sh ./Build test
			}
		}
		post {
			success {
				mail to:      'sd@zu.com', 
				     subject: "SUCCESS: ${currentBuild.fullDisplayName}", 
				     body:    "Hello World successfully passed its tests.\n"
			}
			failure {
				mail to:      'sd@zu.com', 
				     subject: "FAILURE: ${currentBuild.fullDisplayName}", 
				     body:    "Hello World FAILED its tests.\n"
			}
		}

	}
}
*/