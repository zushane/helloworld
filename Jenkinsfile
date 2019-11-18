#!groovy

/***
 * Jenkinsfile for perl HelloWorld project.
 *   Declarative version. 
 */


pipeline {
	agent { docker 'perl:5.30.0' }
//	agent { docker 'centos:7' }

	stages {
		stage( 'Docker' ) {
			steps {
				sh 'cat /etc/issue'
				sh 'env'
				sh '/usr/local/bin/cpanm Module::Build Test::More'
			}
		}
		stage( 'Build' ) {
			steps {
//				slackSend channel: "#test", color: "#ACF0FD", message: "🛠 Build Started: <${env.BUILD_URL}|${currentBuild.fullDisplayName}>"
				echo 'Building perl HelloWorld...'
				sh '/usr/local/bin/perl Build.PL'
				sh './Build'
			}
		}
		stage( 'Test' ) {
			steps {
//				slackSend channel: "#test", color: "#ACF0FD", message: "📝 Testing Started: <${env.BUILD_URL}|${currentBuild.fullDisplayName}>"
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
//			slackSend channel: "#test", color: "good", message: "😀 SUCCESS: <${env.BUILD_URL}|${currentBuild.fullDisplayName}>" 
		}
		failure {
			echo 'FAILURE.'
			mail to: 'sd@zu.com', subject: "💣 FAILURE: ${currentBuild.fullDisplayName}", body: "Hello World FAILED its tests.\n"
//			slackSend channel: "#test", color: "danger", message: "💣 FAILURE: <${env.BUILD_URL}|${currentBuild.fullDisplayName}>"
		}
	}
	
}
