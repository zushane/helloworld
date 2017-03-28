#!groovy

/***
 * Jenkinsfile for perl HelloWorld project. 
 */


pipeline {
	agent any

	stages {
		stage( 'Build' ) {
			steps {
				echo 'Building perl HelloWorld...'
				sh '/usr/bin/perl Build.PL'
			}
		}
		stage( 'Test' ) {
			steps {
				echo 'Testing perl HelloWorld...'
				sh './Build test'
			}
		}
		stage( 'Deploy' ) {
			steps {
				echo "Nothing to deploy, really..."
			}
		}
	}
	post {
		success {
			echo 'SUCCESS'
			mail to: 'sd@zu.com', subject: "😀 SUCCESS: ${currentBuild.fullDisplayName}", body: "Hello World successfully passed its tests.\n"
		}
		failure {
			echo 'FAILURE'
			mail to: 'sd@zu.com', subject: "😵 FAILURE: ${currentBuild.fullDisplayName}", body: "Hello World FAILED its tests.\n"
		}
	}
	
}