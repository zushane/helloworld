#!groovy

pipeline {
	
	agent {
		docker 'haskell'
	}

	triggers {
		//H H(0-6) * * *
		cron('28 16 * * *')
	}

	environment {
		TRIGGERED="nope"
	}

	stages {
		stage( 'Detect Build Cause' ) {
			steps {
				echo "Trying to detect the cause of this build."
				script {
					def specificCause = currentBuild.rawBuild.getCause(hudson.triggers.TimerTrigger$TimerTriggerCause) != null
					if ( specificCause == true )  {
						TRIGGERED="YUP"
					}
                }
			}
			echo "Triggered? -${TRIGGERED}"
		}
		stage( 'Build' ) {
			steps {
				slackSend channel: "#test", color: "#ACF0FD", message: "🛠 Build Started: <${env.BUILD_URL}|${currentBuild.fullDisplayName}>"
				echo 'Building Haskell Hello World...'
				sh '/opt/ghc/8.0.2/bin/ghc  --make -O2 helloworld.hs -o helloworld'
			}
		}

		stage( 'Test' ) {
			steps {
				slackSend channel: "#test", color: "#ACF0FD", message: "📝 Testing Started: <${env.BUILD_URL}|${currentBuild.fullDisplayName}>"
				echo 'Testing Haskell Hello World...'
				sh './helloworld'
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
			mail to: 'sd@zu.com', subject: "😀 SUCCESS: ${currentBuild.fullDisplayName}", body: "Haskell Hello World successfully passed its tests.\n"
			slackSend channel: "#test", color: "good", message: "😀 SUCCESS: <${env.BUILD_URL}|${currentBuild.fullDisplayName}>" 
		}
		failure {
			echo 'FAILURE.'
			mail to: 'sd@zu.com', subject: "💣 FAILURE: ${currentBuild.fullDisplayName}", body: "Haskell Hello World FAILED its tests.\n"
			slackSend channel: "#test", color: "danger", message: "💣 FAILURE: <${env.BUILD_URL}|${currentBuild.fullDisplayName}>"
		}
	}
}
