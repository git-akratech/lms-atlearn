<?php

class __Mustache_79376bdef6af3cb1716c86ddaf8eefc1 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $value = $context->findDot('urls.noevents');
        $buffer .= $this->section03aa8f6cf0a9c431e3b81a51382dac4a($context, $indent, $value);

        return $buffer;
    }

    private function section0da079e8ecded1d3dc97887fb486b7eb(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' noevents, block_timeline ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' noevents, block_timeline ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section03aa8f6cf0a9c431e3b81a51382dac4a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
<div class="hidden text-xs-center text-center mt-3" data-region="no-events-empty-message">
    <p class="text-muted mt-1">{{#str}} noevents, block_timeline {{/str}}</p>
</div>
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '<div class="hidden text-xs-center text-center mt-3" data-region="no-events-empty-message">
';
                $buffer .= $indent . '    <p class="text-muted mt-1">';
                $value = $context->find('str');
                $buffer .= $this->section0da079e8ecded1d3dc97887fb486b7eb($context, $indent, $value);
                $buffer .= '</p>
';
                $buffer .= $indent . '</div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
