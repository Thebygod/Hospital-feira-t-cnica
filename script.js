// Animação de fade nos títulos ao rolar
window.addEventListener('DOMContentLoaded', () => {
  const titulos = document.querySelectorAll('h2');
  const fadeInOnScroll = () => {
    titulos.forEach(titulo => {
      const rect = titulo.getBoundingClientRect();
      if (rect.top < window.innerHeight - 60) {
        titulo.style.opacity = 1;
        titulo.style.transform = 'scale(1)';
      } else {
        titulo.style.opacity = 0.3;
        titulo.style.transform = 'scale(0.95)';
      }
    });
  };
  window.addEventListener('scroll', fadeInOnScroll);
  fadeInOnScroll();

  // Mensagem de boas-vindas temporária
  const msg = document.createElement('div');
  msg.textContent = 'Bem-vindo ao SUS do Paraguai!';
  msg.style.position = 'fixed';
  msg.style.top = '18px';
  msg.style.left = '50%';
  msg.style.transform = 'translateX(-50%)';
  msg.style.background = 'linear-gradient(90deg, #388e3c 60%, #43a047 100%)';
  msg.style.color = '#fff';
  msg.style.padding = '12px 32px';
  msg.style.borderRadius = '8px';
  msg.style.fontWeight = 'bold';
  msg.style.fontSize = '1.1rem';
  msg.style.boxShadow = '0 2px 12px #43a04755';
  msg.style.zIndex = '9999';
  msg.style.opacity = '0.95';
  document.body.appendChild(msg);
  setTimeout(() => {
    msg.style.transition = 'opacity 1s';
    msg.style.opacity = '0';
    setTimeout(() => msg.remove(), 1200);
  }, 2500);
});
