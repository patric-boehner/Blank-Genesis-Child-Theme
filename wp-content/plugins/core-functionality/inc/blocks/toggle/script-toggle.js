// Toggle
// https://www.a11ywithlindsey.com/blog/javascript-accessibility-accordions

const accordionButtons = document.querySelectorAll('.toggle__button');
const accordionSections = document.querySelectorAll('.toggle__content');

accordionSections.forEach(section =>  {
  section.setAttribute('aria-hidden', true)
  section.classList.remove('open')
})

accordionButtons.forEach(button => {
  button.setAttribute('aria-expanded', false);
  
  const expanded = button.getAttribute('aria-expanded');
  const number = button.getAttribute('id').split('-').pop();
  const associatedSection = document.getElementById(`toggle__content-${number}`)
 
  button.addEventListener('click', () => {
    
    button.classList.toggle('expanded');
    associatedSection.classList.toggle('open');
    if (button.classList.contains('expanded')) {
      button.setAttribute('aria-expanded', true);
      associatedSection.setAttribute('aria-hidden', false);
    } else {
      button.setAttribute('aria-expanded', false);
      associatedSection.setAttribute('aria-hidden', true);
    }
  })
})

