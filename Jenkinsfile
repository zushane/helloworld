#!groovy

pipeline {
	
	agent {
		docker 'haskell'
	}

	stages {
		stage( 'Build' ) {
			slackSend channel: "#test", color: "#ACF0FD", message: "🛠 Build Started: <${env.BUILD_URL}|${currentBuild.fullDisplayName}>"
			echo 'Building Haskell Hello World...'
			sh 'ghc  --make -O2 helloworld.hs -o helloworld'
		}

		stage( 'Test' ) {
			slackSend channel: "#test", color: "#ACF0FD", message: "📝 Testing Started: <${env.BUILD_URL}|${currentBuild.fullDisplayName}>"
			echo 'Testing Haskell Hello World...'
			sh './helloworld'
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
