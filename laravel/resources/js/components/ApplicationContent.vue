<template>
    <div class="flex-center position-ref full-height">
        <div class="content quote-wrapper" @click='changeQuote'>
            <a :href='github' class="site--info"><span class="site--link"><i class="fab fa-github"></i></span></a>
            <div class="site--quote">
                <div class="title quote m-b-md noselect">
                    <!-- TODO - Transliteration -->
                    {{ quote }}
                </div>
                <span v-if="quote" class="site--quote-info">
                    <div>
                        <!-- TODO - Transliteration -->
                        Svordom
                        <p>
                            {{ quoteid }} / {{ quoteAmount }}
                        </p>
                    </div>
                </span>
                <div class="site--quote-rating">
                    <span class="rating rate-plus" @click.stop="vote('like')"><i class="fas fa-thumbs-up" :class="{ 'green' : liked == true}"></i></span>
                    <span class="rating rate-negative" @click.stop="vote('dislike')"><i class="fas fa-thumbs-down" :class="{ 'red' : liked == false}"></i></span>
                </div>
            </div>
            <span class="site--character">
                <img :src="character" />
            </span>
            <span class="site--quote-likes">{{ likes }} gillar denna svordom!</span>
        </div>
    </div>
</template>

<script>
    export default {
        beforeMount() {
            this.getContent();
        },
        data () {
            return {
                // Conditions
                liked: null,

                // Stores
                quotes: '',
                likes: '',
                quoteAmount: 0,
                character: "./images/haddock.png",

                // Data
                quote: '',
                quoteid: 0,

                // Misc
                // TODO - Put this is in a config file
                github: 'https://github.com/PatricNox/HaddockSvordomar.se',
                // TODO - Dynamic site selection based on tenant
                site: 'haddock',
            }
        },
        methods: {
            async getContent() {
                let randomQuote;
                axios
                    .get('/quotes/data')
                    .then(response => (
                            // Save all loaded quotes.
                            this.quotes = response,

                            // Select a random quote.
                            randomQuote = this.rotate(this.quotes),
                            this.quote = randomQuote.quote + '!',

                            // Store the random quote's id.
                            this.quoteid = randomQuote.id,

                            // Store the random quote's likes.
                            this.likes = this.parseLikes(randomQuote.likes),

                            // Get the total amount of quotes.
                            this.quoteAmount = response.data.length
                        )
                    )
            },

            /* Change quote. */
            changeQuote() {
                let newQuote = this.rotate(this.quotes);
                this.quote = newQuote.quote + '!';
                this.quoteid = newQuote.id;
                this.liked = null;
                this.likes = this.parseLikes(newQuote.likes);
            },

            /* Select a random element from the data array. */
            rotate(response) {
                return response.data[
                    Math.floor(Math.random() * response.data.length)
                ];
            },

            /* Vote for quote. */
            vote(type) {
                if (this.liked !== null) {
                    return;
                }

                // Update backend.
                let userDecision = (type === 'like') ? true : false;
                axios
                    .post('/quotes/vote/' + this.quoteid, {
                        likedQuote: userDecision,
                    })
                    .then(response => (
                            this.liked = userDecision,
                            this.likes = this.parseLikes(response.data.likes)
                        )
                    );
            },

            /* Parse like amount. */
            parseLikes(likesAmount) {
                // TODO - Transliteration
                switch (likesAmount) {
                    // Grammar for no likes.
                    case 0:
                        return 'Inga kaptener';

                    // Grammar for One like.
                    case 1:
                        return 'En kapten';

                    default:
                        return likesAmount + ' kaptener';
                }
            }
        }
    }
</script>
