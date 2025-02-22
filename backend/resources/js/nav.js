document.addEventListener('DOMContentLoaded', () => {
  // Menu Mobile (o mesmo código que já tinhamos)
  const mobileMenuButton = document.querySelector('[aria-controls="mobile-menu"]');
  const mobileMenu = document.getElementById('mobile-menu');

  if (mobileMenuButton && mobileMenu) {
      mobileMenuButton.addEventListener('click', () => {
          const expanded = mobileMenuButton.getAttribute('aria-expanded') === 'true';
          mobileMenuButton.setAttribute('aria-expanded', !expanded);
          mobileMenu.classList.toggle('hidden');
          mobileMenuButton.querySelector('svg.block').classList.toggle('hidden');
          mobileMenuButton.querySelector('svg.hidden').classList.toggle('hidden');
      });
  }

  // Dropdown do Perfil
  const userMenuButton = document.getElementById('user-menu-button');
  const userMenu = userMenuButton?.nextElementSibling;

  if (userMenuButton && userMenu) {
      userMenuButton.addEventListener('click', (event) => {
          event.stopPropagation(); // Evita a propagação do evento
          const expanded = userMenuButton.getAttribute('aria-expanded') === 'true';
          userMenuButton.setAttribute('aria-expanded', !expanded);
          userMenu.classList.toggle('hidden');
      });

      // Fechar o dropdown quando clicar fora.
      document.addEventListener('click', (event) => {
          if (userMenu && userMenuButton && !userMenu.contains(event.target) && !userMenuButton.contains(event.target)) {
              userMenu.classList.add('hidden');
              userMenuButton.setAttribute('aria-expanded', false);
          }
      });

      document.addEventListener('click', (event) => {
        if (userMenu && userMenuButton && !userMenu.contains(event.target) && !userMenuButton.contains(event.target)) {
            if (!userMenu.classList.contains('hidden')) { // Verifica se o menu está aberto
                userMenu.classList.add('hidden');
                userMenuButton.setAttribute('aria-expanded', false);
            }
        }
    });
  }
});