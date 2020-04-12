<template>
    <div class="flex-center position-ref full-height">
        <div class="content quote-wrapper">
            <span :class="'site--character ' + site"></span>
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
                quote: '',
                quoteid: 0,
                quoteAmount: 0,
                // TODO - Dynamic site selection based on tenant
                site: 'haddock',
            }
        },
        methods: {
            async getContent() {
                let randomQuote;
                axios
                    .get('/tenant-data')
                    .then(response => (
                            // Select a random quote.
                            randomQuote = this.rotate(response),
                            this.quote = randomQuote.quote + '!',

                            // Store the random quote's id.
                            this.quoteid = randomQuote.id,

                            // Get the total amount of quotes.
                            this.quoteAmount = response.data.length
                        )
                    )
            },

            /* Select a random element from the data array. */
            rotate(response) {
                return response.data[
                    Math.floor(Math.random() * response.data.length)
                ];
            }
        }
    }
</script>
