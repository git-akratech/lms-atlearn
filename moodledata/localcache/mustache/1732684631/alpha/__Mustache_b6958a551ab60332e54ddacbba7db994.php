<?php

class __Mustache_b6958a551ab60332e54ddacbba7db994 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $value = $context->find('hascourses');
        if (empty($value)) {
            
            $buffer .= $indent . '    <div class="mt-3 pl-2 badge badge-warning" data-region="no-courses-empty-message">
';
            $buffer .= $indent . '        <div class="d-inline-flex align-items-center">
';
            $buffer .= $indent . '            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><g data-name="icon"><g data-name="alert-circle"><rect width="24" height="24" opacity="0"/><path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8z"/><circle cx="12" cy="16" r="1"/><path d="M12 7a1 1 0 0 0-1 1v5a1 1 0 0 0 2 0V8a1 1 0 0 0-1-1z"/></g></g></svg>   
';
            $buffer .= $indent . '            <span class="ml-2">';
            $value = $context->find('str');
            $buffer .= $this->section8ac1faa3b604bd216bd6406aef5a4809($context, $indent, $value);
            $buffer .= '
';
            $buffer .= $indent . '        </div>
';
            $buffer .= $indent . '    </div>
';
        }

        return $buffer;
    }

    private function section8ac1faa3b604bd216bd6406aef5a4809(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' nocoursesinprogress, block_timeline ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' nocoursesinprogress, block_timeline ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
