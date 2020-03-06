<template>
    <select multiple class="input-sm" :name="name" id="select2-template">
        <slot></slot>
    </select>
</template>

<script>
  import Select2 from 'select2';

    export default{
        props: ['options', 'value', 'name'],
        template: '#select2-template',
        data(){
            return{
                msg: 'hello vue'
            }
        },
        mounted(){
            var vm = this;
            $(this.$el)
                .select2({theme: "bootstrap", data: this.options})
                .val(this.value)
                .trigger('change')
                .on('change', function () {
                    vm.$emit('input',  $(this).val())
                })
        },
        watch: {
            value: function (value) {
                if ([...value].sort().join(",") !== [...$(this.$el).val()].sort().join(","))
                    $(this.$el).val(value).trigger('change');
            },
            options: function (options) {
                $(this.$el).select2({ data: options })
            }
        },
        destroyed: function () {
            $(this.$el).off().select2('destroy')
        }
    }

</script>
