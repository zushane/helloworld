#!groovy

pipeline {
	
	agent {
		docker 'haskell'
	}

	environment {
		TRIGGERED="FALSE"
	}

	triggers {
		//H H(0-6) * * *
		parameterizedCron('''
			* 11 * * * %TRIGGERED=TRUE
		''')
	}
	stages {
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
		stage( 'Triggered' ) {
			steps {
				echo "Am I triggered? -${TRIGGERED}-"
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
