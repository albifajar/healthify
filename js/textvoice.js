function play() {
  responsiveVoice.setDefaultVoice("Indonesian Female")
  responsiveVoice.speak(document.getElementById("textdies").textContent)
}

function stop() {
  responsiveVoice.cancel()
}
