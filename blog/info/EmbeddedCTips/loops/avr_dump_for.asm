
; Push values to stack to be used as temp registers
push r16       ; to be used as `n`
push r17       ; to be used as `i`

mov r16, r22   ; move the function input `n` to R16

cp r22, r1     ; check if function input `n` is zero
breq .+10      ; if equal, jump to the first pop instruction
ldi r17, 0x00  ; Sets `i` to zero

rcall .-30     ; calls doSomething()

subi r17, 0xFF ; subtract `i` by 0xFF, which is the
               ; same as adding it by 1 (arithmatic underflow)

cpse r16, r17  ; if `n`=`i`, skip the next instruction
rjmp .-8       ; jump back to `rcall`

; restore temp values back and return from function
pop r17
pop r16
ret
