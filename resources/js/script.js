import {
    animate,
    inView,
    hover,
    press
} from "https://cdn.jsdelivr.net/npm/motion@12.7.3/+esm";

import {
    animate as animeAnimate
} from 'https://cdn.jsdelivr.net/npm/animejs/+esm';


inView(".scroll-left", (element) => {
    animate(
        element, {
            opacity: 1,
            x: [-100, 0]
        }, {
            duration: 0.9,
            easing: [0.17, 0.55, 0.55, 1],
        }
    );
    return () => animate(element, {
        opacity: 0,
        x: -100
    });
});

// Animasi masuk dari kanan
inView(".scroll-right", (element) => {
    animate(
        element, {
            opacity: 1,
            x: [100, 0]
        }, {
            duration: 0.9,
            easing: [0.17, 0.55, 0.55, 1],
        }
    );
    return () => animate(element, {
        opacity: 0,
        x: 100
    });
});

hover(".box-hover", (element) => {
    animate(element, {
        scale: 1.3
    })

    return () => animate(element, {
        scale: 1
    })
});

press(".box-press", (element) => {
    animate(element, {
        scale: 0.8
    }, {
        type: "spring",
        stiffness: 1000
    })

    return () =>
        animate(element, {
            scale: 1
        }, {
            type: "spring",
            stiffness: 500
        })
});

animeAnimate('span.brand-letter', {
    // Property keyframes
    y: [{
            to: '-2.75rem',
            ease: 'outExpo',
            duration: 600
        },
        {
            to: 0,
            ease: 'outBounce',
            duration: 800,
            delay: 100
        }
    ],
    // Property specific parameters
    rotate: {
        from: '-1turn',
        delay: 0
    },
    delay: (_, i) => i * 50, // Function based value
    ease: 'inOutCirc',
    loopDelay: 1000,
    loop: true
});

document.querySelectorAll(".box").forEach((el) => {
    animate(el, {
        opacity: 0,
        scale: 0.5
    }, {
        duration: 0
    });

    inView(el, () => {
        animate(el, {
            opacity: 1,
            scale: 1
        }, {
            duration: 0.6,
            easing: "ease-out"
        });

        return () => {};
    });
});
