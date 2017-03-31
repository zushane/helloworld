#!groovy

/***
 * Jenkinsfile for perl HelloWorld project.
 *   Declarative version. 
 */


pipeline {
	agent any

	stages {
		stage( 'Build' ) {
			steps {
				slackSend token: "BDUdWyWbqhGr3nSIhlIOEzzh", teamDomain: "zucomm", channel: "#test", message: "Build Started - ${env.JOB_NAME} ${env.BUILD_NUMBER} (<${env.BUILD_URL}|Open>)"
				echo 'Building perl HelloWorld...'
				sh '/usr/bin/perl Build.PL'
			}
		}
		stage( 'Test' ) {
			steps {
				slackSend token: "BDUdWyWbqhGr3nSIhlIOEzzh", teamDomain: "zucomm", channel: "#test", message: "Testing Started - ${env.JOB_NAME} ${env.BUILD_NUMBER} (<${env.BUILD_URL}|Open>)"
				echo 'Testing perl HelloWorld...'
				sh './Build test'
			}
		}
		stage( 'Pizza Party' ) {
			steps {
				echo "Ham & Pineapple, please!"
			}
		}
	}
	post {
		success {
			echo 'SUCCESS.'
			mail to: 'sd@zu.com', subject: "😀 SUCCESS: ${currentBuild.fullDisplayName}", body: "Hello World successfully passed its tests.\n"
			slackSend token: "BDUdWyWbqhGr3nSIhlIOEzzh", teamDomain: "zucomm", channel: "#test", message: "😀 SUCCESS: ${currentBuild.fullDisplayName}" 
		}
		failure {
			echo 'FAILURE.'
			mail to: 'sd@zu.com', subject: "💣 FAILURE: ${currentBuild.fullDisplayName}", body: "Hello World FAILED its tests.\n"
			slackSend token: "BDUdWyWbqhGr3nSIhlIOEzzh", teamDomain: "zucomm", channel: "#test", message: "💣 FAILURE: ${currentBuild.fullDisplayName}"
		}
	}
	
}