<template>
    <div class="flex-center position-ref full-height">
        <div class="content quote-wrapper">
            <a :href='github'><span class="site--info"><i class="fab fa-github"></i></span></a>
            <span :class="'site--character ' + site" @click='changeQuote'></span>
            <div class="site--quote">
                <div class="title quote m-b-md noselect" @click='changeQuote'>
                    <!-- TODO - Transliteration -->
                    {{ quote }}
                </div>
                <span v-if="quote" class="site--quote-info" @click='changeQuote'>
                    <div>
                        <!-- TODO - Transliteration -->
                        Svordom
                        <p>
                            {{ quoteid }} / {{ quoteAmount }}
                        </p>
                    </div>
                </span>
                <div class="site--quote-rating">
                    <span class="rating rate-plus" @click="vote('like')"><i class="fas fa-thumbs-up" :class="{ 'green' : liked == true}"></i></span>
                    <span class="rating rate-negative" @click="vote('dislike')"><i class="fas fa-thumbs-down" :class="{ 'red' : liked == false}"></i></span>
                </div>
            </div>
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
                quotes: '',
                quote: '',
                quoteid: 0,
                quoteAmount: 0,
                liked: null,
                // TODO - Author info box
                github: 'https://github.com/PatricNox',
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

                let userDecision = (type === 'like') ? true : false;
                axios
                    .post('/quotes/vote/' + this.quoteid, {
                        likedQuote: userDecision,
                    })
                    .then(response => (
                            this.liked = userDecision
                        )
                    )
            }
        }
    }
</script>
