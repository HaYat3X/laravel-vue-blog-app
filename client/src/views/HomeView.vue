<script setup>
import { Field, Form, ErrorMessage } from 'vee-validate';
import * as yup from 'yup';

const schema = yup.object({
  email: yup.string().email().required(),
  name: yup.string().required(),
});

function onSubmit(values) {
  alert(JSON.stringify(values, null, 2));
}
</script>

<template>
  <Form :validation-schema="schema" @submit="onSubmit">
    <Field name="email" type="email" />
    <ErrorMessage name="email" />

    <Field name="name" />
    <ErrorMessage name="name" />

    <button type="submit">Submit</button>
  </Form>
</template>
