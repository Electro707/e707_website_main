
push r17      ; pushes r17 to stack, allowing it to be used as temporary variable
mov r17, r22  ; moves the function input `n` to R17

rcall .-84    ; calls doSomething()

dec r17       ; decrement 1 from n
brne .-6      ; if n != 0, go to `rcall`, otherise continue

pop r17       ; restore value of r17
ret           ; return
