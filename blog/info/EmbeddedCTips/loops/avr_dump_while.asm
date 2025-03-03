
push r17      ; pushes r17 to stack, allowing it to be used as temporary variable

ldi r17, 0xFF   ; sets R17 (what will be used as n) to 255
add r17, r22    ; add R15 to the function input `n`
; the above essentially subtracts 1 from n, using arithmatic overflow
cp r22, r1      ; compare function input to 0 (r1 is always zero)
breq .+6        ; if equal to zero, go to the final pop instruction

rcall .-70      ; calls doSomething()

subi r17, 0x01  ; subtract 1 from n
brcc .-6        ; if n just turned <0 (carry bit),
                ; don't branch. otherwise go back to `rcall`

                pop r17         ; restore value of r17
ret             ; return
