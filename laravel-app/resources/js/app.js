import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'

createInertiaApp({
  resolve: name => require(`./Pages/${name}`),
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },
})

export function checkInactivity(){
  // Função que tira a foto
  function takePhoto() {
    console.log('Entrou no tira foto');

    let video = document.querySelector("#video");
    let canvas = document.querySelector("#canvas");
    let file = null;
    

    video.style.display = "none";
    canvas.style.display = "none";

    async function getVideoOnCamera() { 
      let stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: false });
      video.srcObject = stream;
    }
    getVideoOnCamera();

    function getTakePicture(){
      canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
      let image_data_url = canvas.toDataURL('image/jpeg');
      
      // data url of the image
      console.log(image_data_url);
      return canvas;
    }
    getTakePicture();

    function createOccurrence(){
      axios.post('/')
    }

    createOccurrence();

  }

  function checkLockWindows() { 
    function handleVisibilityChange() {
      if (document.visibilityState === "hidden") {
        // A tela foi bloqueada
        console.log("Tela bloqueada!");
        return true
      } else {
        // A tela foi desbloqueada
        console.log("Tela desbloqueada!");
        return false
      }
    }
    
    document.addEventListener("visibilitychange", handleVisibilityChange);

    if (handleVisibilityChange() === false) {
      return false;
    } 
    return true;
    // Adicionar o evento visibilitychange ao documento
  }

  // Variáveis para controlar o temporizador e os eventos do mouse/teclado
  let timer;
  let movementMouse = false;
  let useKeyboard = false;

  // Função para reiniciar o temporizador
  function resetTimer() {
    clearTimeout(timer);

    timer = setTimeout(function() {
      if (!movementMouse && !useKeyboard && checkLockWindows() === false) {
        takePhoto();
      }

      movementMouse = false;
      useKeyboard = false;

      resetTimer();
    }, 5000);
  }

  // Evento de movimento do mouse
  document.addEventListener("mousemove", function() {
    movementMouse = true;
  });

  // Evento de uso do teclado
  document.addEventListener("keydown", function() {
    useKeyboard = true;
  });

  // Iniciar o temporizador
  resetTimer();
}
