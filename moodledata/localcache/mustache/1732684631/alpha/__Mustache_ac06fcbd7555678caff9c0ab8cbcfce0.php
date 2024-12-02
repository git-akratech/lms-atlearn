<?php

class __Mustache_ac06fcbd7555678caff9c0ab8cbcfce0 extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . '<div class="filter mb-1 border-bottom" data-filter-for="';
        $value = $this->resolveValue($context->find('name'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '">
';
        $buffer .= $indent . '    <div class="filter-header d-flex align-items-start justify-content-between">
';
        $buffer .= $indent . '        <div class="filter-name">
';
        $buffer .= $indent . '            <label class="mb-0">';
        $value = $this->resolveValue($context->find('name'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '</label>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '    </div>
';

        return $buffer;
    }
}
