window.addEventListener("load", () => {
    ScrollTrigger.refresh();
});

window.addEventListener('DOMContentLoaded', function() {
    gsap.registerPlugin(ScrollTrigger, SplitText);
    refreshFsLightbox();
    ScrollTrigger.refresh();
    burgerMenu();
    animationHero();
    aboutAnimation();
    initAboutGallery();
    galleryCourses();
    dropdownSkills();
    animationGallery();
    galleryShop();
    ajaxPopup();
});

const remToPx = rem => rem * parseFloat(getComputedStyle(document.documentElement).fontSize);

const burgerMenu = () => {
    const burger = document.querySelector(".header__burger");
    const menu = document.querySelector(".menu");
    const body = document.body;

    if (burger && menu) {
        burger.addEventListener("click", () => {
            const isActive = burger.classList.toggle("active");
            menu.classList.toggle("active", isActive);
            body.classList.toggle("fixed", isActive);
        });

        menu.querySelectorAll("a").forEach(link => {
            link.addEventListener("click", () => {
                burger.classList.remove("active");
                menu.classList.remove("active");
                body.classList.remove("fixed");
            });
        });
    }
}

const animationHero = () =>{
    if (document.querySelector('.hero-about-section') && window.matchMedia("(min-width: 576px)").matches) {
        let heroBlock = gsap.timeline({
            scrollTrigger: {
                trigger: '.hero-about-section',
                start: 'bottom bottom',
                end: 'bottom top',
                scrub: true,
                pin: true,
                markers: false,
                pinSpacing: false,
            }
        });

        heroBlock.to(
            ".hero-about-section__inner",
            {
                opacity: 1,
                duration: 0.5,
            },
            0
        );
    }
}

const aboutAnimation = () => {
    const titleEl = document.querySelector(".about__content__title");
    if (!titleEl) return;

    const split = new SplitText(titleEl, { type: "chars, words" });
    const chars = split.chars;

    const tl = gsap.timeline({
        ease: "linear",
        scrollTrigger: {
            trigger: ".about__content__title",
            scrub: true,
            start: "top bottom",
            end: "bottom center",
            markers: false,
        }
    });

    tl.set(chars, {
        color: "#E2E2E233"
    }, 0);

    tl.fromTo(
        chars,
        { color: "#E2E2E233" },
        {
            color: "#E2E2E2",
            stagger: { each: 0.1, from: "start" },
            duration: 0.3,
            ease: "none"
        },
        0
    );

    if (window.matchMedia("(min-width: 576px)").matches) {
        const image = gsap.timeline({
            ease: "linear",
            scrollTrigger: {
                trigger: ".hero-section",
                scrub: true,
                start: "top top",
                end: "+=1000",
                markers: false,
            }
        });

        image.fromTo(
            ".hero-about-section__inner",
            {
                backgroundPositionX: "70%",
                duration: 0.3,
            },
            {
                backgroundPositionX: "-50%",
                duration: 0.3,
            },
            0
        );
    }
};

const makeFadeSwiper = (el, extra = {}) => {
    if (!el) return null;
    return new Swiper(el, {
        slidesPerView: 1,
        spaceBetween: 0,
        effect: 'fade',
        fadeEffect: { crossFade: true },
        speed: 600,
        autoHeight: true,
        watchOverflow: true,
        allowTouchMove: false,
        normalizeSlideIndex: true,
        navigation: {
            prevEl: '.about-gallery__content__information__navigation ._prev',
            nextEl: '.about-gallery__content__information__navigation ._next',
        },
    });
};

const initAboutGallery = () => {
    const root = document.querySelector('.about-gallery');
    if (!root) return;

    const swImages  = makeFadeSwiper(root.querySelector('.about-gallery__images .swiper'), { allowTouchMove: true });
    const swNumber  = makeFadeSwiper(root.querySelector('.about-gallery__content__number .swiper'), { allowTouchMove: false });
    const swDesc    = makeFadeSwiper(root.querySelector('.about-gallery__content__information__description .swiper'), { allowTouchMove: false });
    const swDescMobile    = makeFadeSwiper(root.querySelector('.about-gallery__content__number__description-mobile .swiper'), { allowTouchMove: false });
    const swCounter = makeFadeSwiper(root.querySelector('.about-gallery__content__information__image__counter .swiper'), { allowTouchMove: false });
    const swList    = makeFadeSwiper(root.querySelector('.about-gallery__content__information__image__list .swiper'), { allowTouchMove: true });

    const slaves = [swNumber, swDesc, swDescMobile, swCounter, swList].filter(Boolean);
    if (swImages) swImages.controller.control = slaves;

    slaves.forEach(s => { if (s) s.controller.control = null; });

    if (swList && swImages) {
        swList.on('click', () => {
            const idx = swList.clickedIndex;
            if (Number.isInteger(idx) && idx >= 0) swImages.slideTo(idx);
        });
    }

    let galleryBlock = gsap.timeline({
        scrollTrigger: {
            trigger: '.about-gallery',
            start: 'top top',
            end: '+=500',
            scrub: true,
            pin: true,
            markers: false,
            pinSpacing: true,
        }
    });
};

const galleryCourses = () => {
    const sliders = document.querySelectorAll('.gallery-courses');

    sliders.forEach((sliderEl) => {
        if (sliderEl.dataset.swiperInited === '1') return;

        const host = sliderEl.closest('.courses') || sliderEl.parentElement;

        const nextEls = Array.from(host.querySelectorAll('.navigation ._next'));
        const prevEls = Array.from(host.querySelectorAll('.navigation ._prev'));

        const hasNav = nextEls.length && prevEls.length;

        const swiper = new Swiper(sliderEl, {
            slidesPerView: 1,
            spaceBetween: remToPx ? remToPx(8 / 16) : 8,
            speed: 700,
            grabCursor: false,

            loop: true,
            watchOverflow: true,

            ...(hasNav && {
                navigation: {
                    nextEl: nextEls,
                    prevEl: prevEls,
                    disabledClass: 'is-disabled',
                    hiddenClass: 'is-hidden',
                    lockClass: 'is-locked',
                },
            }),

            breakpoints: {
                769:  { slidesPerView: 3, spaceBetween: remToPx ? remToPx(0.8) : 12 },
                1367: { slidesPerView: 3, spaceBetween: remToPx ? remToPx(1)   : 16 },
            },
        });

        sliderEl.dataset.swiperInited = '1';
        sliderEl._swiper = swiper;

        if (hasNav) {
            nextEls.forEach(btn => btn.addEventListener('click', (e) => {
                e.preventDefault();
                swiper.slideNext();
            }));
            prevEls.forEach(btn => btn.addEventListener('click', (e) => {
                e.preventDefault();
                swiper.slidePrev();
            }));
        }
    });
};

const dropdownSkills = () => {
    const skillItems = document.querySelectorAll(".skills__item");

    skillItems.forEach(item => {
        const title = item.querySelector(".skills__item__title");
        const desc = item.querySelector(".skills__item__description");

        if (!title || !desc) return;

        desc.style.maxHeight = "0";
        desc.style.overflow = "hidden";
        desc.style.transition = "max-height 0.5s ease";

        title.addEventListener("click", () => {
            const isOpen = item.classList.contains("active");

            skillItems.forEach(i => {
                i.classList.remove("active");
                const d = i.querySelector(".skills__item__description");
                d.style.maxHeight = "0";
            });

            if (isOpen) {
                item.classList.remove("active");
                desc.style.maxHeight = "0";
            } else {
                item.classList.add("active");

                const style = window.getComputedStyle(desc);
                const paddingTop = parseFloat(style.paddingTop) || 0;
                const paddingBottom = parseFloat(style.paddingBottom) || 0;

                const totalHeight = desc.scrollHeight + paddingTop + paddingBottom;
                desc.style.maxHeight = totalHeight + "px";
            }
        });
    });
};

const animationGallery = () => {
    if (window.matchMedia("(min-width: 576px)").matches) {
        let reached90 = false;

        let galleryBlock = gsap.timeline({
            scrollTrigger: {
                trigger: '.gallery',
                start: 'top top',
                end: '+=1000',
                scrub: true,
                pin: true,
                markers: false,
                pinSpacing: true,
                onUpdate: (self) => {
                    if (!reached90 && self.progress >= 0.5) {
                        document.querySelector('.gallery__slider')?.classList.add('done');
                        document.querySelector('.gallery__information')?.classList.add('done');
                        reached90 = true;
                    } else if (reached90 && self.progress < 0.5) {
                        document.querySelector('.gallery__slider')?.classList.remove('done');
                        document.querySelector('.gallery__information')?.classList.remove('done');
                        reached90 = false;
                    }
                }
            }
        });

        galleryBlock.to(
            ".gallery__title",
            {
                width: '90%',
                top: 0,
                xPercent: -50,
                yPercent: 0,
                duration: 0.5,
            },
            0
        );

    }


    const swiper = new Swiper(document.querySelector('#slider-gallery'), {
        slidesPerView: 1,
        spaceBetween: remToPx(.5),
        speed: 700,
        grabCursor: false,
        watchOverflow: true,
        loop: true,

        navigation: {
            nextEl: '.gallery__information__navigation ._next',
            prevEl: '.gallery__information__navigation ._prev',
        },

        breakpoints: {
            768: {
                slidesPerView: 4,
                spaceBetween: remToPx(2.5),
            },
        },
    });
}

const galleryShop = () => {
    const swiper = new Swiper(document.querySelector('#gallery-shop'), {
        slidesPerView: 1,
        spaceBetween: remToPx(.5),
        speed: 700,
        grabCursor: false,
        watchOverflow: true,
        loop: true,

        navigation: {
            nextEl: '.shop__gallery__navigation ._next',
            prevEl: '.shop__gallery__navigation ._prev',
        },

        breakpoints: {
            768: {
                slidesPerView: 4,
                spaceBetween: remToPx(1),
            },
        },
    });
}

const ajaxPopup = () => {
    const popup = document.querySelector(".popup");
    const popupBg = popup.querySelector(".popup__background");
    const popupExit = popup.querySelectorAll(".popup__exit");
    const popupTitle = popup.querySelector(".popup__content__title");
    const popupTags = popup.querySelector(".popup__content__tag__list");
    const popupDescription = popup.querySelector(".popup__content__description");
    const popupButton = popup.querySelector(".popup__content__button");

    function openPopup() {
        popup.classList.add("active");
        document.body.style.overflow = "hidden";
    }

    function closePopup() {
        popup.classList.remove("active");
        document.body.style.overflow = "";
    }

    popupBg.addEventListener("click", closePopup);

    popupExit.forEach(btn => {
        btn.addEventListener("click", closePopup);
    });

    popupButton.addEventListener("click", closePopup);

    document.querySelectorAll(".courses__gallery__item").forEach(item => {
        item.addEventListener("click", async () => {
            const courseId = item.dataset.courseId;

            const formData = new FormData();
            formData.append("action", "get_course_data");
            formData.append("course_id", courseId);

            try {
                const response = await fetch("/wp-admin/admin-ajax.php", {
                    method: "POST",
                    body: formData
                });
                const data = await response.json();

                if (data.success) {
                    popupTitle.textContent = data.data.title;
                    popupTags.innerHTML = `
            <div class="popup__content__tag p1 _druk">${data.data.price}</div>
            <div class="popup__content__tag p1 _druk">${data.data.time}</div>
          `;
                    popupDescription.innerHTML = data.data.description;

                    openPopup();
                } else {
                    console.error(data.message);
                }
            } catch (err) {
                console.error("Ошибка AJAX:", err);
            }
        });
    });
}
