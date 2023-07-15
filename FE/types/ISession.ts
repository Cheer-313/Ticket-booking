import { IUser } from "./IUser";
import { User } from "@prisma/client";

export interface ISession {
    authToken?: string;
    user?: IUser
    userId?: number
}