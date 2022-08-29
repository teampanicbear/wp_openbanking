import { gsap } from 'gsap';
import { map, lerp, getMousePos, calcWinsize, getRandomNumber } from './utils';

// Calculate the viewport size
let winsize = calcWinsize();
window.addEventListener('resize', () => winsize = calcWinsize());

let mousepos = {x: winsize.width/2, y: winsize.height/2};

const handleMouseMove = (evt) => {
    mousepos = getMousePos(evt)
}

class GridItem {
    constructor(el) {
        this.DOM = {el: el};
        this.move();
    }
    move() {
        let translationVals = {tx: 0, ty: 0, r: 0};
        const xstart = getRandomNumber(15,50);
        const ystart = getRandomNumber(30,40);
        const randR = getRandomNumber(-12,12);

        const render = () => {
            translationVals.tx = lerp(translationVals.tx, map(mousepos.x, 0, winsize.width, -xstart, xstart), 0.07);
            translationVals.ty = lerp(translationVals.ty, map(mousepos.y, 0, winsize.height, -ystart, ystart), 0.07);
            translationVals.r = lerp(translationVals.r, map(mousepos.x, 0, winsize.width, -randR, randR), 0.07);

            gsap.set(this.DOM.el, {
                x: translationVals.tx,
                y: translationVals.ty,
                rotation: translationVals.r,
            });
            requestAnimationFrame(render);
        }
        requestAnimationFrame(render);
    }
}

export default class Grid {
    constructor(el, selector) {
        this.DOM = {el: el};
        this.gridItems = [];
        this.items = [...this.DOM.el.querySelectorAll(selector)];
        this.items.forEach(item => this.gridItems.push(new GridItem(item)));
        this.init = () => {
            window.addEventListener('mousemove', handleMouseMove)
        }
        this.destroy = () => {
            window.removeEventListener('mousemove', handleMouseMove)
        }
    }
}
