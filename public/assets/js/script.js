document.addEventListener("DOMContentLoaded", function () {
  // ================== WHATSAPP FORM ==================
  const form = document.getElementById("waForm");
  form.addEventListener("submit", function (e) {
    e.preventDefault();

    const nameValue = document.getElementById("name").value.trim();
    const messageValue = document.getElementById("message").value.trim();

    if (!nameValue || !messageValue) {
      alert("Harap isi nama dan pesan.");
      return;
    }

    const phone = "6289670323475";
    const text = `Halo, saya ${nameValue}. ${messageValue}`;
    const encodedText = encodeURIComponent(text);
    const waLink = `https://wa.me/${phone}?text=${encodedText}`;

    alert("Pesan berhasil dikirim");
    form.reset();

    window.open(waLink, "_blank");
  });

  // ================== NAVBAR SCROLL EFFECT ==================
  const navbar = document.getElementById("navbar");
  let lastScrollTop = 0;

  function handleNavbarScroll() {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > 100) {
      navbar.classList.add("scrolled");
    } else {
      navbar.classList.remove("scrolled");
    }

    if (scrollTop > lastScrollTop && scrollTop > 200) {
      navbar.classList.add("hidden");
    } else {
      navbar.classList.remove("hidden");
    }

    lastScrollTop = scrollTop;
  }

  // ================== INTERSECTION OBSERVER ANIMATIONS ==================
  const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -50px 0px"
  };

  const animationObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add("animate-in");
        animationObserver.unobserve(entry.target);
      }
    });
  }, observerOptions);

  function initializeAnimations() {
    const animatedElements = document.querySelectorAll(
      ".hero-content, .hero-image, .about-image, .about-content, " +
      ".product-card, .superiority-card, .testimonial-card, " +
      ".section-title, .products-title, .superiority-title, .testimonial-title, .order-title, " +
      ".order-content, .footer-content"
    );
    animatedElements.forEach((el, index) => {
      el.style.animationDelay = `${index * 0.1}s`;
      animationObserver.observe(el);
    });
  }

  // ================== PRODUCT & CARD HOVER EFFECTS ==================
  function initializeProductAnimations() {
    const productCards = document.querySelectorAll(".product-card");
    productCards.forEach(card => {
      card.addEventListener("mouseenter", function () {
        this.style.transform = "translateY(-10px) scale(1.02)";
        this.style.boxShadow = "0 20px 40px rgba(0,0,0,0.1)";
      });
      card.addEventListener("mouseleave", function () {
        this.style.transform = "translateY(0) scale(1)";
        this.style.boxShadow = "0 10px 30px rgba(0,0,0,0.1)";
      });
    });
  }

  // ================== LAZY LOAD IMAGES ==================
  function lazyLoadImages() {
    const imageObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add("loaded");
          observer.unobserve(entry.target);
        }
      });
    });
    document.querySelectorAll("img").forEach(img => {
      img.classList.add("lazy");
      imageObserver.observe(img);
    });
  }

  // ================== ADD CSS DYNAMICALLY ==================
  function addAnimationStyles() {
    const style = document.createElement("style");
    style.textContent = `
      .fade-in-up, .fade-in-down, .fade-in-left, .fade-in-right {
        opacity: 0;
        transition: all 0.8s ease;
      }
      .fade-in-down { transform: translateY(-30px); }
      .fade-in-up { transform: translateY(30px); }
      .fade-in-left { transform: translateX(-30px); }
      .fade-in-right { transform: translateX(30px); }
      .animate-in { opacity: 1 !important; transform: translate(0,0) !important; }
      .navbar { transition: all 0.3s ease; }
      .navbar.scrolled { background: rgba(255,255,255,0.98); box-shadow: 0 2px 20px rgba(0,0,0,0.1); }
      .navbar.hidden { transform: translateY(-100%); }
    `;
    document.head.appendChild(style);
  }

  // ================== INIT ==================
  function init() {
    addAnimationStyles();
    initializeAnimations();
    initializeProductAnimations();
    lazyLoadImages();

    window.addEventListener("scroll", handleNavbarScroll);
  }

  init();
});
