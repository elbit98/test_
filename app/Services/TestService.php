<?php
namespace App\Services;


class TestService
{

    /**
     * @param $data
     * @param $mask
     *
     * @return array
     */
    public function getOptions($data, $mask)
    {
        $options = [];
        foreach ($data->attributes as $d) {

            $iteration_option = 0;
            foreach ($d->options as $option) {

                $field = "fb_{$d->id}_{$option->id}";
                if ($mask->{$field} == 1) {
                    $options[$iteration_option]['label'] = $d->label;
                    $options[$iteration_option]['value'] = $option->value;

                    $iteration_option++;
                }

            }
        }

        return $options;

    }

}