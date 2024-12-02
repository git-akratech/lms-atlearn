<?php

class __Mustache_56252628b17666d434da154bd33e3963 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '
';
        $buffer .= $indent . '    <p class="text-muted" data-region="text">';
        $value = $context->find('str');
        $buffer .= $this->section0b29c2994fe0ba8246f0e0b9c6a5a538($context, $indent, $value);
        $buffer .= '</p>
';

        return $buffer;
    }

    private function section0b29c2994fe0ba8246f0e0b9c6a5a538(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' unabletomessage, core_message ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' unabletomessage, core_message ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
