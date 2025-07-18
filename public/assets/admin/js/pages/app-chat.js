
class Chat {

    initStatus() {
        const swiper = new Swiper(".mySwiper", {
            loop: true,
            pagination: '.swiper-pagination',
            paginationClickable: true,
            slidesPerView: 'auto',
            spaceBetween : 8,
            autoHeight: true,
        });
    }

    initChats() {
        const self = this;
        this.chatContainer = document.querySelector('.chat-conversation-list');
        // console.log(this.chatContainer);
        this.simplebar = new SimpleBar(this.chatContainer);

        this.scrollPosition = 0;
        this.scrollToBottom(false);

        const form = document.querySelector('form#chat-form');
        const messageInput = form.querySelector('input');
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const message = messageInput.value;
            if (message.trim().length > 0) {
                messageInput.value = "";
                self.sendMessage(message);
            }

        });

        if (this.simplebar.getScrollElement()) {
            this.simplebar.getScrollElement().onscroll = function (e) {
                self.scrollPosition = e.target.scrollTop;
            }
        }
    }
    scrollToBottom(smooth = true) {
        const self = this;
        if (this.simplebar.getContentElement()) {
            const maxPosition = this.simplebar.getContentElement().scrollHeight - 570;
            const time = smooth ? 10 : 1;
            const interval = setInterval(function () {
                self.scrollPosition += 2;
                self.simplebar.getScrollElement().scrollTop = self.scrollPosition;
                if (self.scrollPosition > maxPosition) clearInterval(interval);
            }, time);
        }
    }

    init() {
        this.initStatus();
        this.initChats();
    }
}

document.addEventListener('DOMContentLoaded', function (e) {
    new Chat().init();
});
