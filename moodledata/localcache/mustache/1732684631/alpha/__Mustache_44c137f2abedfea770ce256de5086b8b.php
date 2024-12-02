<?php

class __Mustache_44c137f2abedfea770ce256de5086b8b extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<div class="position-relative">
';
        $buffer .= $indent . '
';
        $value = $context->find('cccsummary');
        $buffer .= $this->section6bad0629337881420699d7754e7e6ef8($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '        <div
';
        $buffer .= $indent . '            class="rui-course-card rui-progress-';
        $value = $this->resolveValue($context->find('progress'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= ' ';
        $value = $context->find('displayteachers');
        $buffer .= $this->section39fc98886700ceef9bc7a83c130b2bad($context, $indent, $value);
        $buffer .= ' ';
        $value = $context->find('cccsummary');
        $buffer .= $this->section37ba44babfd4ecd137dba062427f3cdb($context, $indent, $value);
        $buffer .= '"
';
        $buffer .= $indent . '            role="listitem" data-region="course-content"
';
        $buffer .= $indent . '            data-course-id="';
        $value = $this->resolveValue($context->find('id'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '">
';
        $buffer .= $indent . '
';
        $value = $context->find('cccsummary');
        $buffer .= $this->section798a8f085c73162c8a7d82a9ce6e6a25($context, $indent, $value);
        $buffer .= $indent . '
';
        $value = $context->find('hasenrolmenticons');
        $buffer .= $this->section75c824fcc4cf1d1c8964f49bc43db4e2($context, $indent, $value);
        $buffer .= $indent . '
';
        $value = $context->find('forcedlanguage');
        $buffer .= $this->section9d54e26a8f336cec054ea378e1626532($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '            <a href="';
        $value = $this->resolveValue($context->findDot('config.wwwroot'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '/course/view.php?id=';
        $value = $this->resolveValue($context->find('id'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '">
';
        $buffer .= $indent . '                <div class="rui-course-card-wrapper">
';
        $buffer .= $indent . '                    <figure class="rui-course-card-img-top"
';
        $buffer .= $indent . '                        style="background-image: url(';
        $value = $this->resolveValue($context->find('image'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= ');"><span
';
        $buffer .= $indent . '                            class="sr-only">';
        $value = $context->find('str');
        $buffer .= $this->section3910a8c621ceaa261689b2c46701fdbc($context, $indent, $value);
        $buffer .= ' ';
        $value = $this->resolveValue($context->find('fullname'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '</span></figure>
';
        $buffer .= $indent . '    
';
        $buffer .= $indent . '                    <div class="rui-course-card-body">
';
        $buffer .= $indent . '                        <div class="d-flex flex-wrap">
';
        $buffer .= $indent . '                            <span class="sr-only">
';
        $buffer .= $indent . '                                ';
        $value = $context->find('str');
        $buffer .= $this->section3910a8c621ceaa261689b2c46701fdbc($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '                            </span>
';
        $buffer .= $indent . '    
';
        $value = $context->find('visible');
        if (empty($value)) {
            
            $buffer .= $indent . '                            <div class="d-inline-flex flex-wrap mb-2">
';
            $buffer .= $indent . '                                <span class="rui-course-hidden-badge">
';
            $buffer .= $indent . '                                    <svg class="mr-1" width="16" height="16"
';
            $buffer .= $indent . '                                        fill="none" viewBox="0 0 24 24">
';
            $buffer .= $indent . '                                        <path stroke="currentColor"
';
            $buffer .= $indent . '                                            stroke-linecap="round"
';
            $buffer .= $indent . '                                            stroke-linejoin="round" stroke-width="2"
';
            $buffer .= $indent . '                                            d="M18.6247 10C19.0646 10.8986 19.25 11.6745 19.25 12C19.25 13 17.5 18.25 12 18.25C11.2686 18.25 10.6035 18.1572 10 17.9938M7 16.2686C5.36209 14.6693 4.75 12.5914 4.75 12C4.75 11 6.5 5.75 12 5.75C13.7947 5.75 15.1901 6.30902 16.2558 7.09698"></path>
';
            $buffer .= $indent . '                                        <path stroke="currentColor"
';
            $buffer .= $indent . '                                            stroke-linecap="round"
';
            $buffer .= $indent . '                                            stroke-linejoin="round" stroke-width="2"
';
            $buffer .= $indent . '                                            d="M19.25 4.75L4.75 19.25"></path>
';
            $buffer .= $indent . '                                        <path stroke="currentColor"
';
            $buffer .= $indent . '                                            stroke-linecap="round"
';
            $buffer .= $indent . '                                            stroke-linejoin="round" stroke-width="2"
';
            $buffer .= $indent . '                                            d="M10.409 13.591C9.53033 12.7123 9.53033 11.2877 10.409 10.409C11.2877 9.5303 12.7123 9.5303 13.591 10.409"></path>
';
            $buffer .= $indent . '                                    </svg>
';
            $buffer .= $indent . '                                    ';
            $value = $context->find('str');
            $buffer .= $this->section6e27c6955cb05d4f01c4ab8799872e12($context, $indent, $value);
            $buffer .= '
';
            $buffer .= $indent . '                                </span>
';
            $buffer .= $indent . '                            </div>
';
        }
        $buffer .= $indent . '    
';
        $buffer .= $indent . '                        </div>
';
        $buffer .= $indent . '    
';
        $buffer .= $indent . '                        <div class="d-flex mb-1">
';
        $buffer .= $indent . '                            <h4 class="rui-course-card-title mb-1 coursename">
';
        $buffer .= $indent . '                                <span class="sr-only">
';
        $buffer .= $indent . '                                    ';
        $value = $context->find('str');
        $buffer .= $this->section812e363a880e32990e0f434e718baef5($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '                                </span>
';
        $buffer .= $indent . '                                ';
        $value = $this->resolveValue($context->find('fullname'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '                            </h4>
';
        $buffer .= $indent . '                        </div>
';
        $buffer .= $indent . '    
';
        $value = $context->find('category');
        $buffer .= $this->section3a0ad7628e32bb0e32cadab29f08611c($context, $indent, $value);
        $buffer .= $indent . '    
';
        $buffer .= $indent . '                    </div>
';
        $buffer .= $indent . '                </div>                
';
        $buffer .= $indent . '
';
        $value = $context->find('hasprogress');
        if (empty($value)) {
            
            $buffer .= $indent . '                <div class="rui-course-card-footer">
';
            $buffer .= $indent . '                    <button
';
            $buffer .= $indent . '                        class="rui-course-card-link btn btn-primary">
';
            $buffer .= $indent . '                        <span class="rui-course-card-link-text">';
            $value = $this->resolveValue($context->find('stringaccess'), $context);
            $buffer .= ($value === null ? '' : $value);
            $buffer .= '</span>
';
            $buffer .= $indent . '                        <svg width="22" height="22" fill="none" viewBox="0 0 24 24">
';
            $buffer .= $indent . '                            <path stroke="currentColor" stroke-linecap="round"
';
            $buffer .= $indent . '                                stroke-linejoin="round" stroke-width="2"
';
            $buffer .= $indent . '                                d="M13.75 6.75L19.25 12L13.75 17.25"></path>
';
            $buffer .= $indent . '                            <path stroke="currentColor" stroke-linecap="round"
';
            $buffer .= $indent . '                                stroke-linejoin="round" stroke-width="2"
';
            $buffer .= $indent . '                                d="M19 12H4.75"></path>
';
            $buffer .= $indent . '                        </svg>
';
            $buffer .= $indent . '                    </button>
';
            $buffer .= $indent . '                </div>
';
        }
        $buffer .= $indent . '
';
        $value = $context->find('hasprogress');
        $buffer .= $this->sectionEa5f986c3207de5ff07eb5294d78705f($context, $indent, $value);
        $buffer .= $indent . '            </a>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '</div>';

        return $buffer;
    }

    private function section53825ffa7564a226fa96d177292af92b(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'aria:coursesummary,
                    block_myoverview';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'aria:coursesummary,
';
                $buffer .= $indent . '                    block_myoverview';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section24ff4048c451ae7d9b3dade83d016e0d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '{{coursecarddesclimit}},
                {{{summary}}}';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $this->resolveValue($context->find('coursecarddesclimit'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= ',
';
                $buffer .= $indent . '                ';
                $value = $this->resolveValue($context->find('summary'), $context);
                $buffer .= ($value === null ? '' : $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section9a7969661e91b6ae1ca4ef61703ff4bf(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                    <a href="{{config.wwwroot}}/user/profile.php?id={{{id}}}" class="rui-card-contact d-flex rui-user-{{{role}}}" role="button" data-title="{{{fullname}}} - {{{role}}}">
                        <img src="{{{userpicture}}}" class="rui-card-avatar"
                        alt="{{{fullname}}}" />
                        <div class="rui-user-name ml-2 d-flex flex-wrap">
                            <span class="w-100 text-white">{{{fullname}}}</span>
                            <span class="text-white small text-opacity">{{{role}}}</span>
                        </div>
                    </a>
                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                    <a href="';
                $value = $this->resolveValue($context->findDot('config.wwwroot'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '/user/profile.php?id=';
                $value = $this->resolveValue($context->find('id'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '" class="rui-card-contact d-flex rui-user-';
                $value = $this->resolveValue($context->find('role'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '" role="button" data-title="';
                $value = $this->resolveValue($context->find('fullname'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= ' - ';
                $value = $this->resolveValue($context->find('role'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '">
';
                $buffer .= $indent . '                        <img src="';
                $value = $this->resolveValue($context->find('userpicture'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '" class="rui-card-avatar"
';
                $buffer .= $indent . '                        alt="';
                $value = $this->resolveValue($context->find('fullname'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '" />
';
                $buffer .= $indent . '                        <div class="rui-user-name ml-2 d-flex flex-wrap">
';
                $buffer .= $indent . '                            <span class="w-100 text-white">';
                $value = $this->resolveValue($context->find('fullname'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '</span>
';
                $buffer .= $indent . '                            <span class="text-white small text-opacity">';
                $value = $this->resolveValue($context->find('role'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '</span>
';
                $buffer .= $indent . '                        </div>
';
                $buffer .= $indent . '                    </a>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section4a20fd0c1f33471bdfc12b59a7d5f419(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                <div class="rui-card-course-contacts my-4">
                    {{#contacts}}
                    <a href="{{config.wwwroot}}/user/profile.php?id={{{id}}}" class="rui-card-contact d-flex rui-user-{{{role}}}" role="button" data-title="{{{fullname}}} - {{{role}}}">
                        <img src="{{{userpicture}}}" class="rui-card-avatar"
                        alt="{{{fullname}}}" />
                        <div class="rui-user-name ml-2 d-flex flex-wrap">
                            <span class="w-100 text-white">{{{fullname}}}</span>
                            <span class="text-white small text-opacity">{{{role}}}</span>
                        </div>
                    </a>
                    {{/contacts}}
                </div>
                ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                <div class="rui-card-course-contacts my-4">
';
                $value = $context->find('contacts');
                $buffer .= $this->section9a7969661e91b6ae1ca4ef61703ff4bf($context, $indent, $value);
                $buffer .= $indent . '                </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section5066e8f0387b5446f911877a8a8b5523(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                {{#hascontacts}}
                <div class="rui-card-course-contacts my-4">
                    {{#contacts}}
                    <a href="{{config.wwwroot}}/user/profile.php?id={{{id}}}" class="rui-card-contact d-flex rui-user-{{{role}}}" role="button" data-title="{{{fullname}}} - {{{role}}}">
                        <img src="{{{userpicture}}}" class="rui-card-avatar"
                        alt="{{{fullname}}}" />
                        <div class="rui-user-name ml-2 d-flex flex-wrap">
                            <span class="w-100 text-white">{{{fullname}}}</span>
                            <span class="text-white small text-opacity">{{{role}}}</span>
                        </div>
                    </a>
                    {{/contacts}}
                </div>
                {{/hascontacts}}
                ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $context->find('hascontacts');
                $buffer .= $this->section4a20fd0c1f33471bdfc12b59a7d5f419($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionDd1e7eaa7eab21fa41b4c78bea42375d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                    {{{customfields}}}
                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                    ';
                $value = $this->resolveValue($context->find('customfields'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section6bad0629337881420699d7754e7e6ef8(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
        <div class="rui-course-card-text">
            <div class="rui-course-card-container">
                <span class="sr-only">{{#str}}aria:coursesummary,
                    block_myoverview{{/str}}</span>
                {{#shortentext}}{{coursecarddesclimit}},
                {{{summary}}}{{/shortentext}}

                {{#displayteachers}}
                {{#hascontacts}}
                <div class="rui-card-course-contacts my-4">
                    {{#contacts}}
                    <a href="{{config.wwwroot}}/user/profile.php?id={{{id}}}" class="rui-card-contact d-flex rui-user-{{{role}}}" role="button" data-title="{{{fullname}}} - {{{role}}}">
                        <img src="{{{userpicture}}}" class="rui-card-avatar"
                        alt="{{{fullname}}}" />
                        <div class="rui-user-name ml-2 d-flex flex-wrap">
                            <span class="w-100 text-white">{{{fullname}}}</span>
                            <span class="text-white small text-opacity">{{{role}}}</span>
                        </div>
                    </a>
                    {{/contacts}}
                </div>
                {{/hascontacts}}
                {{/displayteachers}}

                <div class="rui-custom-fields-card">
                    {{#showcustomfields}}
                    {{{customfields}}}
                    {{/showcustomfields}}
                </div>
            </div>
        </div>
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '        <div class="rui-course-card-text">
';
                $buffer .= $indent . '            <div class="rui-course-card-container">
';
                $buffer .= $indent . '                <span class="sr-only">';
                $value = $context->find('str');
                $buffer .= $this->section53825ffa7564a226fa96d177292af92b($context, $indent, $value);
                $buffer .= '</span>
';
                $buffer .= $indent . '                ';
                $value = $context->find('shortentext');
                $buffer .= $this->section24ff4048c451ae7d9b3dade83d016e0d($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '
';
                $value = $context->find('displayteachers');
                $buffer .= $this->section5066e8f0387b5446f911877a8a8b5523($context, $indent, $value);
                $buffer .= $indent . '
';
                $buffer .= $indent . '                <div class="rui-custom-fields-card">
';
                $value = $context->find('showcustomfields');
                $buffer .= $this->sectionDd1e7eaa7eab21fa41b4c78bea42375d($context, $indent, $value);
                $buffer .= $indent . '                </div>
';
                $buffer .= $indent . '            </div>
';
                $buffer .= $indent . '        </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section8c9d09748c81a521a506b699cb5a019e(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'rui-course-card-avatars';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'rui-course-card-avatars';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section39fc98886700ceef9bc7a83c130b2bad(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '{{#hascontacts}}rui-course-card-avatars{{/hascontacts}}';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $context->find('hascontacts');
                $buffer .= $this->section8c9d09748c81a521a506b699cb5a019e($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section37ba44babfd4ecd137dba062427f3cdb(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'rui-course-card--sum';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'rui-course-card--sum';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section798a8f085c73162c8a7d82a9ce6e6a25(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            <div class="rui-course-card-icons--right rui-course-info">
                <div class="rui-icon-container">
                    <div class="icon--open">
                        <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13V15"></path>
                            <circle cx="12" cy="9" r="1" fill="currentColor"></circle>
                            <circle cx="12" cy="12" r="7.25" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></circle>
                          </svg>    
                    </div>
                    <div class="icon--close hidden">
                        <svg width="20" height="20" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.25 6.75L6.75 17.25"></path>
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.75 6.75L17.25 17.25"></path>
                          </svg>                           
                    </div>
                </div>
            </div>
            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '            <div class="rui-course-card-icons--right rui-course-info">
';
                $buffer .= $indent . '                <div class="rui-icon-container">
';
                $buffer .= $indent . '                    <div class="icon--open">
';
                $buffer .= $indent . '                        <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
';
                $buffer .= $indent . '                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13V15"></path>
';
                $buffer .= $indent . '                            <circle cx="12" cy="9" r="1" fill="currentColor"></circle>
';
                $buffer .= $indent . '                            <circle cx="12" cy="12" r="7.25" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></circle>
';
                $buffer .= $indent . '                          </svg>    
';
                $buffer .= $indent . '                    </div>
';
                $buffer .= $indent . '                    <div class="icon--close hidden">
';
                $buffer .= $indent . '                        <svg width="20" height="20" fill="none" viewBox="0 0 24 24">
';
                $buffer .= $indent . '                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.25 6.75L6.75 17.25"></path>
';
                $buffer .= $indent . '                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.75 6.75L17.25 17.25"></path>
';
                $buffer .= $indent . '                          </svg>                           
';
                $buffer .= $indent . '                    </div>
';
                $buffer .= $indent . '                </div>
';
                $buffer .= $indent . '            </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionD3d6359da74225aafaced73e1b9ad477(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                <div class="rui-icon-container">
                    {{{.}}}
                </div>
                ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                <div class="rui-icon-container">
';
                $buffer .= $indent . '                    ';
                $value = $this->resolveValue($context->last(), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '                </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section75c824fcc4cf1d1c8964f49bc43db4e2(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            <div class="rui-course-card-icons">
                {{#enrolmenticons}}
                <div class="rui-icon-container">
                    {{{.}}}
                </div>
                {{/enrolmenticons}}
            </div>
            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '            <div class="rui-course-card-icons">
';
                $value = $context->find('enrolmenticons');
                $buffer .= $this->sectionD3d6359da74225aafaced73e1b9ad477($context, $indent, $value);
                $buffer .= $indent . '            </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section9d54e26a8f336cec054ea378e1626532(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            <div class="rui-course-card-icons--right rui-course-lang">
                <div class="rui-icon-container">{{forcedlanguage}}</div>
            </div>
            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '            <div class="rui-course-card-icons--right rui-course-lang">
';
                $buffer .= $indent . '                <div class="rui-icon-container">';
                $value = $this->resolveValue($context->find('forcedlanguage'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</div>
';
                $buffer .= $indent . '            </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section3910a8c621ceaa261689b2c46701fdbc(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'courseoverviewfiles, moodle';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'courseoverviewfiles, moodle';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section6e27c6955cb05d4f01c4ab8799872e12(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' hiddenfromstudents ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' hiddenfromstudents ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section812e363a880e32990e0f434e718baef5(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'aria:coursename, core_course';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'aria:coursename, core_course';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section3a0ad7628e32bb0e32cadab29f08611c(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                        <div class="d-inline-flex mt-2">
                            <div class="rui-course-cat-badge">
                                {{{category}}}
                            </div>
                        </div>
                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                        <div class="d-inline-flex mt-2">
';
                $buffer .= $indent . '                            <div class="rui-course-cat-badge">
';
                $buffer .= $indent . '                                ';
                $value = $this->resolveValue($context->find('category'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '                            </div>
';
                $buffer .= $indent . '                        </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionEa5f986c3207de5ff07eb5294d78705f(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                <div class="rui-course-card-progress-bar">
                    {{> block_myoverview/progress-bar}}
                </div>
                ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                <div class="rui-course-card-progress-bar">
';
                if ($partial = $this->mustache->loadPartial('block_myoverview/progress-bar')) {
                    $buffer .= $partial->renderInternal($context, $indent . '                    ');
                }
                $buffer .= $indent . '                </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
