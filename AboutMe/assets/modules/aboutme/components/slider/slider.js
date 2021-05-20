require("./slider.css");

export default class slider {
    constructor(id) {
        this.id = id;
        this.slider = document.getElementById(this.id);
        this.countItems = this.slider.getElementsByClassName("slider-item").length;
        this.sliderItems = [];
        this.timeSlide = 7000;

        this.initSlider();
    }

    initSlider() {
        for (let index = 1; index <= this.countItems; index++) {
            this.sliderItems.push(this.slider.getElementsByClassName('item-' + index)[0]);
            this.sliderItems[index - 1].style.order = index;
            if (index > 1) {
                this.sliderItems[index - 1].style.display = "none";
            }
        }

        setTimeout(this.hide, this.timeSlide - 1000, this.sliderItems[0]);
        setInterval(this.nextSlide, this.timeSlide, this);
    }

    nextSlide(context) {
        for (let index = 1; index <= context.countItems; index++) {
            let currentOrderStyle = context.sliderItems[index - 1].style.order;
            var currentOrderNum =
                Number(currentOrderStyle[currentOrderStyle.length - 1]) + 1;

            if (currentOrderNum > context.countItems) {
                currentOrderNum = 1;
            }

            context.sliderItems[index - 1].style.order = currentOrderNum;

            if (currentOrderNum === 1) {
                context.sliderItems[index - 1].style.display = "block";
                context.show(context.sliderItems[index - 1]);
                setTimeout(
                    context.hide,
                    context.timeSlide - 1000,
                    context.sliderItems[index - 1]
                );
            } else {
                context.sliderItems[index - 1].style.display = "none";
                context.sliderItems[index - 1].classList.remove("b-show");
                context.sliderItems[index - 1].classList.remove("b-hide");
            }
        }
    }

    prevSlide(context) {
        for (let index = context.countItems; index >= 1; index--) {
            let currentOrderStyle = context.sliderItems[index - 1].style.order;
            var currentOrderNum =
                Number(currentOrderStyle[currentOrderStyle.length - 1]) - 1;

            if (currentOrderNum < 1) {
                currentOrderNum = context.countItems;
            }

            context.sliderItems[index - 1].style.order = currentOrderNum;

            if (currentOrderNum === 1) {
                context.sliderItems[index - 1].style.display = "block";
                context.show(context.sliderItems[index - 1]);
                setTimeout(context.hide, timeSlide - 1000, context.sliderItems[index - 1]);
            } else {
                context.sliderItems[index - 1].style.display = "none";
                context.sliderItems[index - 1].classList.remove("b-show");
                context.sliderItems[index - 1].classList.remove("b-hide");
            }
        }
    }

    show(item) {
        item.classList.add("b-show");
    }

    hide(item) {
        item.classList.add("b-hide");
    }
}

let items = document.getElementsByClassName("slider");

let slider = [];

items.forEach(element => {
    slider.push(new slider(element.id));
});
