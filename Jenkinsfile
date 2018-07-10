#!groovy

pipeline {
	
	agent {
		docker 'haskell'
	}

	triggers {
		//H H(0-6) * * *
		cron('17 11 * * *')
	}

	environment {
		TIMER_TRIGGERED="false"
	}

	stages {
		stage( 'Detect Build Cause' ) {
			steps {
				script {
					def specificCause = currentBuild.rawBuild.getCause(hudson.triggers.TimerTrigger$TimerTriggerCause) != null
					if ( specificCause == true )  {
						TIMER_TRIGGERED="true"
					}
                }
			}
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
			// We should only have a Pizza Party when we've pushed something up, not when we're triggered by a cron timer.
			when {
				equals expected: "false", actual: TIMER_TRIGGERED
			}
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
